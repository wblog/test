<?php
class IndexAction extends CommonAction {
    public function index(){
		$listarr=$this->listinfo('News');
		$this->assign('ance', D('Announce')->announce());
		//$this->assign('hotlist', D('News')->Hot());
		$this->assign('newscoments', D('Comment')->newscoments());
		$this->assign('newslist', D('Blog')->newsinfo());
		$this->assign('randlist', D('News')->Rand());
		$this->assign('Catlist', D('Columns')->Catlist('News', 1));
		$this->assign('Linklist', D('Link')->Linklist());
		$this->assign('DateList', D('News')->DateList('News'));
		$this->assign('Newsnum', D('News')->Artnums());
		$this->assign('Gknum', D('Guestbook')->Gknum());
		$this->assign('Cmnum', D('Comment')->Cmnum());
		$this->assign('Visitnum', $this->visitNum('count.txt'));
		$this->assign('tags', D('Tag')->TagList('News'));
		$this->assign('title', $title='index');
		$this->assign('info', $listarr['info']);
		$this->assign('page', $listarr['page']);
		$this->assign('menu', D('Columns')->menu());
        $this->display();
    }
}