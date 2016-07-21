<?php
Class Category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->category_model->get_list();
        $this->data['list'] = $list;
       // pre($list);
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/category/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Them moi du lieu
     */
    function check_username(){
        $username = $this->input->post('categoryName');
        $where = array('categoryName'=>$username);
        if ($this->category_model->check_exists($where)){
            $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
            return false;
        }else return true;
    }
    function check_ID(){
        $categoryId = $this->input->post('categoryId');
        $where = array('categoryId'=>$categoryId);
        if ($this->category_model->check_exists($where)){
            $this->form_validation->set_message(__FUNCTION__,'Mã số đã tồn tại');
            return false;
        }else return true;
    }

    function add()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('categoryName', 'Tên', 'required|callback_check_username');
            $this->form_validation->set_rules('categoryId', 'Mã số', 'required|callback_check_ID');
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name  = $this->input->post('categoryName');
                $categoryId = $this->input->post('categoryId');
                $where = array();
                $where['categoryName'] = $name;
                $list1 = $this->category_model-> get_info_rule($where);

                   $data = array(
                       'categoryName'      => $name,
                       'categoryId'        =>$categoryId,

                   );

                   if($this->category_model->create($data))
                   {
                       //tạo ra nội dung thông báo
                       $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                   }else{
                       $this->session->set_flashdata('message', 'Không thêm được');
                   }
                   //chuyen tới trang danh sách
                   redirect(admin_url('category'));

               }


            }

        $this->data['temp'] = 'admin/category/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Cập nhật du lieu
     */
    function edit()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->category_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('category'));
        }
        $this->data['info'] = $info;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('categoryName', 'Tên', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('categoryName');

                //luu du lieu can them
                $data = array(
                    'categoryName'      => $name,

                );
                //them moi vao csdl
                if($this->category_model->update($id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('category'));
            }
        }

        //lay danh sach danh muc cha
        $this->data['temp'] = 'admin/category/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->_del($id);

        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('category'));
    }

    /*
     * Xoa nhieu danh muc san pham
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id , false);
        }
    }

    /*
     * Thuc hien xoa
     */
    private function _del($id, $rediect = true)
    {
        $info = $this->category_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            if($rediect)
            {
                redirect(admin_url('category'));
            }else{
                return false;
            }
        }

        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('categoryId' => $id));
        if($product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Danh mục '.$info->categoryName.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
            if($rediect)
            {
                redirect(admin_url('category'));
            }else{
                return false;
            }
        }

        //xoa du lieu
        $this->category_model->delete($id);

    }
}

