<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
// 공통 게시판 모델
class Board_m extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
 
    function get_list($table = 'ci_board') 
    {
        // 1. 쿼리문 작성 
        //$sql = "SELECT * FROM ".$table." ORDER BY board_id DESC";
        //$query = $this -> db -> query($sql);

        // 2. 쿼리 빌더 클래스 사용 
        $this->db->order_by('board_id','DESC');
        $query = $this->db->get($table);
                        

        

        // 쿼리 실행 : 객체 배열 반환 
        $result = $query -> result();           // $result->board_id   형태로 값 얻음 
        // $result = $query->result_array();    // $result['board_id'] 형태로 값 얻음 

        return $result;
    }
 
}

