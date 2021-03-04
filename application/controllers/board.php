<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
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
 
    
    // 사이트 헤더, 푸터가 자동으로 추가된다.
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
 

    // 목록 불러오기
    public function lists() 
    {
        $data['list'] = $this -> board_m -> get_list();
        $this -> load -> view('board/list_v', $data);
    }
 
}
