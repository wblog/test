<?php
// 首页
class DateAction extends ListAction {
    public function index(){
		$listarr=$this->listinfo('News',$where['ctime'] = array (
				'like',
				$_GET['t']. '%'
			));
		$this->lists();    
		$this->assign('title', $title='文章归档');   
		$this->assign('info', $listarr['info']);
		$this->assign('page', $listarr['page']);
		//dump($listarr);
		//echo $_GET['month'];
       $this->display();
    }
	
}
?>