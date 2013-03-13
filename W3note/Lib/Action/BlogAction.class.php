<?php
// 首页
class BlogAction extends CommonAction {
	public function index() {
		$bloglistarr=$this->listinfo('Blog');
		$this->listarr();
		$this->assign('info', $bloglistarr['info']);//
		$this->assign('page', $bloglistarr['page']);//
		$this->assign('newslist', D('News')->newsinfo());
		$this->assign('Newsnum', D('Blog')->Artnums());
		$this->assign('Gknum', D('Guestbook')->Gknum());
		$this->assign('Cmnum', D('Comment')->Cmnum());
		$this->assign('Visitnum', $this->visitNum('blogcount.txt'));
		$this->assign('title', $title='网志微博客');
		$this->display();
	}
	public function listarr(){
	    $listarr=array();
		$listarr['tagslist']=D('Tag')->TagList('Blog');//标签列表
		$listarr['announce']=D('Announce')->announce();//公告
		$listarr['hotlist']=D('Blog')->Hot();//热点文章
		$listarr['randlist']=D('Blog')->Rand();//随机文章
		$listarr['catlist']=D('Columns')->Catlist('Blog', 4);//栏目列表
		$listarr['dateList']=D('Blog')->DateList('Blog');//归档
		$listarr['dateList']=D('Blog')->DateList('Blog');//归档
		$listarr['menu']= D('Columns')->menu();
	    $this->assign('ance',  $listarr['announce']);	
		$this->assign('hotlist', $listarr['hotlist']);
		$this->assign('randlist', $listarr['randlist']);
		$this->assign('Catlist', $listarr['catlist']);
		$this->assign('DateList', $listarr['dateList']);
		$this->assign('tags', $listarr['tagslist']);
		$this->assign('menu', $listarr['menu']);
	   } 
	public function category() {
		$blogcate=$this->listinfo('Blog',array('catid'=>$_GET['catid']));
		$this->listarr();
		$this->assign('info', $bloglistarr['info']);//
		$this->assign('page', $bloglistarr['page']);//
		$this->assign('newslist', D('News')->newsinfo());
		$this->assign('title', $title='网志微博客');
		$this->display();
		}  
	public function read() {
		$readarr=$this->readaction('Blog');
		$this->listarr();
		$this->assign('vo', $readarr['vo']);
		$this->assign('pageup', $readarr['pageup']);
		$this->assign('pagedown', $readarr['pagedown']);
		$this->assign('recommends', $readarr['recommends']);
		$this->assign('ctlist', D('Comment')->commentlist('Blog',$readarr['id']));
		$this->assign('relalist', $this->relaread('Blog',$readarr['id'],'RelaBlogView'));
		$this->display();
	}
	public function tag() {
		$this->getags('Blog','BlogtagView');
		$listarr=$this->listarr();
		$this->assign('hotlist', $listarr['hotlist']);
		$this->assign('Tagslist', $listarr['tagslist']);	
		$this->assign('Catlist', $listarr['catlist']);
		$this->assign('DateList', $listarr['dateList']);
		$this->assign('newslists', D('Blog')->newsinfo());	
		$this->display();
	}

	public function add() {
		$this->adddata('Comment');
	}
	public function tourl() {
		$this->gettourl('Comment');
	}

	//RSS 
	public function feed() {
		$Bloglist = D('Blog')->order('id')->limit(10)->select();
		import("@.ORG.Rss");
		$RSS = new RSS(C('WEIBONAME'), '', C('WEIBODESC'), ''); //站点标题的链接
		foreach ($Bloglist as $list) {
			$RSS->AddItem($list['title'], U('/blog/' . $list['id']), $list['content'], $list['ctime']);
		}
		$RSS->Display();
	}
}
?>