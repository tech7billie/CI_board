<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 

/*
    1.  _remap($method) : 헤더, 푸터 로드 
    2.  lists()         : 게시물 목록 불러오기 

*/    
class Board extends CI_Controller 
{
 
    function __construct() 
    {
        parent::__construct();
        $this -> load -> database();
        $this -> load -> model('board_m');
        $this -> load -> helper(array('url', 'date'));
    }
 
    // uri 메소드 생략 시 실행되는 기본 메소드 
    public function index() 
    {
        $this -> lists();
    }
 
    
    // 헤더, 푸터 로드
    public function _remap($method) 
    {
        // 헤더 로드
        $this -> load -> view('header_v');
 
        // method_exists( string | object $object , string $method_name) : 클래스 메소드가 존재하는지 확인 , boolean 값 반환 
        if (method_exists($this, $method)) 
        {
            $this -> {"{$method}"}();
        }
 
        // 푸터 로드
        $this -> load -> view('footer_v');
    }
 

    // 게시물 목록 불러오기
    public function lists() 
    {
        // 페이징 라이브러리 로드 
        $this->load->library('pagination');

        // 페이지네이션 주소 
        $config['base_url'] = '/bbs/index.php/board/lists/ci_board/page';
    
        // 페이지네이션 할 전체 레코드의 수. 
        $config['total_rows'] = $this->board_m->get_list($this->uri->segment(3),'count'); // segment(세그먼트 번호)
        
        // 한 페이지 당 게시물 수 
        $config['per_page'] = 5;

        // 페이지 번호가 위치한 세그먼트 
        $config['uri_segment'] = 5;

        // 설정값에 따라 페이지네이션 초기화
        $this->pagination->initialize($config);

        // 페이지 링크를 생성하여 view 에서 사용할 변수에 할당
        $data['pagination'] = $this->pagination->create_links(); // create_links() : 페이지 링크 생성 

        // 게시물 목록을 불러오기 위한 offset(데이터가 시작하는 위치), limit(한 페이지에 보여줄 데이터 수) 값 가져오기 
        $page = $this->uri->segment(5, 1);  // segment(세그먼트 번호, defualt 값)

        // 각 페이지의 시작점?? 찾기 
        if($page > 1)
        {
            $start = (($page/$config['per_page'])) * $config['per_page'];
        }
        else
        {
            $start = ($page -1) * $config['per_page']; 
        }

        $limit = $config['per_page'];

        // 기존 코드(전체 게시물 목록 게시물 번호 기준 내림차로 보여주기)
        // $data['list'] = $this -> board_m -> get_list();
        // $this -> load -> view('board/list_v', $data);

        $data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit);
        $this->load->view('board/list_v', $data);


        


    }
 
}
