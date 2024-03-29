<?php
use SDClasses\AppConf;
use SDClasses\User;

/**
 * @var array $params
 */
?>
<div class="row">
	<br>
	<div class="col-xs-12">
		<div class="alert alert-info">
				<strong><?= User::getUserName( AppConf::getIns()->user ) ?></strong>, you are authorized in KNPC
				<a href="#" data-dismiss="alert" class="close">×</a>
			</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="widget-box">
			<div class="widget-title"><span class="icon"><i class="fa fa-file"></i></span><h5>Recent Posts</h5><span title="54 total posts" class="label label-info tip-left">54</span></div>
			<div class="widget-content nopadding">
				<ul class="recent-posts">
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="img/demo/av2.jpg">
						</div>
						<div class="article-post">
							<span class="user-info"> By: neytiri on 2 Aug 2012, 09:27 AM, IP: 186.56.45.7 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Publish</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</li>
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="img/demo/av3.jpg">
						</div>
						<div class="article-post">
							<span class="user-info"> By: john on on 24 Jun 2012, 04:12 PM, IP: 192.168.24.3 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Publish</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</li>
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="img/demo/av1.jpg">
						</div>
						<div class="article-post">
							<span class="user-info"> By: michelle on 22 Jun 2012, 02:44 PM, IP: 172.10.56.3 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Publish</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</li>
					<li class="viewall">
						<a title="View all posts" class="tip-top" href="#"> + View all + </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6">
		<div class="widget-box">
			<div class="widget-title"><span class="icon"><i class="fa fa-comment"></i></span><h5>Recent Comments</h5><span title="88 total comments" class="label label-info tip-left">88</span></div>
			<div class="widget-content nopadding">
				<ul class="recent-comments">
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="img/demo/av1.jpg">
						</div>
						<div class="comments">
							<span class="user-info"> User: michelle on IP: 172.10.56.3 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Approve</a> <a href="#" class="btn btn-warning btn-xs">Mark as spam</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</li>
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="img/demo/av3.jpg">
						</div>
						<div class="comments">
							<span class="user-info"> User: john on IP: 192.168.24.3 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Approve</a> <a href="#" class="btn btn-warning btn-xs">Mark as spam</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</li>
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="img/demo/av2.jpg">
						</div>
						<div class="comments">
							<span class="user-info"> User: neytiri on IP: 186.56.45.7 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Approve</a> <a href="#" class="btn btn-warning btn-xs">Mark as spam</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</li>
					<li class="viewall">
						<a title="View all comments" class="tip-top" href="#"> + View all + </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>