<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/*
    1. get_list($table = 'ci_board') : 전체 게시물 목록 반환(게시물 번호 기준 내림차순) 


*/

// 공통 게시판 모델
class Board_m extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
 
    
    /*
    // 전체 게시물 목록 반환(게시물 번호 기준 내림차순) 
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
    */
 
    
    function get_list($table ='ci_board', $type='', $offset='', $limit='')
    {
        $limit_query='';

        // 페이징이 있을 경우 $limit_query 변수에 값 할당 
        if($limit !='' OR $offset != '')
        {
            $limit_query = ' LIMIT ' .$offset . ',' .$limit; // limit 절 : $offset 부터 $limit 개만 가져온다.
        }

        // 쿼리문 구성 
        $sql = "SELECT * FROM ".$table." ORDER BY board_id DESC " . $limit_query;
        
        // 쿼리문 실행 
        $query = $this->db->query($sql);

        //  $config['total_rows'] 를 얻기 위해 호출한 경우 
        if($type=='count')
        {
            // 전체 레코드의 수를 반환한다.
            $result = $query -> num_rows(); 
        }
        // 그외의 경우 
        else
        {
            // 조회 결과를 객체 배열 형태로 반환한다.
            $result = $query->result();
        }
        
        return $result;

    }
    

}

