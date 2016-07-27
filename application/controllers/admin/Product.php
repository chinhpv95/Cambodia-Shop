<?php
Class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
    }

    /*
     * Hien thi danh sach san pham
     */
    function index()
    {
        $input = array();
        $id = $this->input->get('id');
        //$id = intval($id);
        $input['where'] = array();
        if($id != null)
        {
            $input['where']['productCode'] = $id;
        }
        $name = $this->input->get('name');
        if($name)
        {
            $input['like'] = array('productName', $name);
        }
        $catelory_id = $this->input->get('catelory');
        $catelory_id = intval($catelory_id);
        if($catelory_id > 0)
        {
            $input['where']['categoryId'] = $catelory_id;
        }

        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('product/index/'); //link hien thi ra danh sach san pham
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        if ($catelory_id != null || $name != null){
            goto a;
        }

        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $cate = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        a:
        //lay danh sach san pha
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

//        lay danh sach danh muc san pham
        $this->load->model('category_model');
        $input = array();

        $catelorys = $this->category_model->get_list();

        $this->data['catelorys'] = $catelorys;
        //pre($catelorys);

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
       // pre($this->data);
    }

    function check_code(){
        $productCode = $this->input->post('productCode');
        $where = array('productCode'=>$productCode);
        if ($this->product_model->check_exists($where)){
            $this->form_validation->set_message(__FUNCTION__,'Sản phẩm đã tồn tại');
            return false;
        }else return true;
    }

    /*
     * Them san pham moi
     */
    function add()
    {
//        lay danh sach danh muc san pham
        $this->load->model('category_model');
        $category = $this->category_model->get_list();
        $this->data['catalogs'] = $category;
        //load thư viện validate dữ liệu
        
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('productName', 'Tên', 'required');
            $this->form_validation->set_rules('productCode', 'Mã số', 'required|callback_check_code');
            $this->form_validation->set_rules('catelory', 'Thể loại', 'required');
            $this->form_validation->set_rules('price', 'Giá', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $productName        = $this->input->post('productName');
                $productCode        = $this->input->post('productCode');
                $cateloryId  = $this->input->post('catelory');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price);



                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }

                //luu du lieu can them
                $data = array(
                    'productName'       => $productName,
                    'productCode' => $productCode,
                    'categoryId' => $cateloryId,
                    'price'      => $price,
                    'image_link' => $image_link,
                    'description'    => $this->input->post('description'),
                );
                //them moi vao csdl
                if($this->product_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('product'));
            }
        }


        //load view
        $this->data['temp'] = 'admin/product/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Chinh sua san pham
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $product = $this->product_model->get_info($id);
        //pre($product);
        if(!$product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $product;

        //lay danh sach danh muc san pham
        $this->load->model('category_model');
        $category = $this->category_model->get_list();
        $this->data['catalogs'] = $category;
       // $this->data['catalogs'] = $category;

        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('productName', 'Tên', 'required');
            $this->form_validation->set_rules('productCode', 'Mã số', 'required');
            $this->form_validation->set_rules('catelory', 'Thể loại', 'required');
            $this->form_validation->set_rules('price', 'Giá', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $productName        = $this->input->post('productName');
                $productCode        = $this->input->post('productCode');
                $cateloryId  = $this->input->post('catelory');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price);

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }

                //upload cac anh kem theo
                //luu du lieu can them
                $data = array(
                    'productName'       => $productName,
                    'productCode'=>$productCode,
                    'categoryId' => $cateloryId,
                    'price'      => $price,
                    'description' => $this->input->post('description')
                );
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
                //pre($data);

                //them moi vao csdl
                if($this->product_model->update($product->productCode, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('product'));
            }
        }


        //load view
        $this->data['temp'] = 'admin/product/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);

        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
        redirect(admin_url('product'));
    }

    /*
     * Xóa nhiều sản phẩm
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }

    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        //thuc hien xoa san pham
        $this->product_model->delete($id);
        //xoa cac anh cua san pham
        $image_link = './upload/product/'.$product->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        //xoa cac anh kem theo cua san pham
        $image_list = json_decode($product->image_list);
        if(is_array($image_list))
        {
            foreach ($image_list as $img)
            {
                $image_link = './upload/product/'.$img;
                if(file_exists($image_link))
                {
                    unlink($image_link);
                }
            }
        }
    }
}



