@extends('app')

@section('content')
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- post-one-start -->
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="post-block">
                        <div class="post-img"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto Info dan Tips" class="img-responsive"></div>
                        <div class="post-sticky"> <i class="fa fa-map-marker">{!! $info->lat !!}|{!! $info->long !!} </i> </div>
                        <div class="post-content">
                            <div>
                                <h1 class="post-title">{!! $info->perkara->nama !!}</h1>
                            </div>
                            <div class="meta"> <span class="meta-date">Dibagikan pada {!! $info->created_at->format('d M Y') !!} </span> <span class="meta-author">by <a href="#">{!! $info->user->name !!}</a></span> </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="blockquote">{!! $info->judul !!}</p>
                    <p>{!! $info->narasi !!}</p>

                    <div class="post-navigation mb30 mt80">
                        <div class="row">
                            <div class="nav-links">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <a href="#" class=" prev-link mb30">Prev Post</a>
                                    <h4 class="previous-next-title"><a href="#">Amazing place to visit</a></h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class=" nav-next text-right"><a href="#" class="next-link mb30">Next Post</a>
                                        <h4 class="previous-next-title"><a href="#">Travel Photography Tips</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Author post start-->
                    <div class="author-block">
                        <div class="row">
                            <div class="author-post">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="author-img">
                                        <a href="#"><img src="images/author-image.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                                    <div class="author-post-content">
                                        <h4 class="author-title"><a href="#" class="title">Jorge McNeal</a></h4>
                                        <span class="author-meta">Author</span>
                                        <p class="author-text"> Pellentesque rhoncus aliquet sem vitae tristique. Fusce blandit massa vitae elementum tinciduntris lorem justo feugiat ac luctus nec faucibus ac semhasellus suscipit orci nisi.</p>
                                        <div class="author-post-btn"><a href="#" class="btn btn-primary btn-lg">view all post</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Author post close-->
                    <div class="related-block">
                        <div class="row">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2>Related Post</h2>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="related-post">
                                            <div class="related-img">
                                                <a href="blog-single.html" class="imghover"><img src="images/related-post-1.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-responsive"></a>
                                            </div>
                                            <div class="related-post-content">
                                                <h2><a href="#" class="title">The Ultimate singapore to do list</a></h2>
                                                <span class="meta-categories">In<a href="#" class="title">"Travel"</a></span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="related-post">
                                            <div class="related-img">
                                                <a href="blog-single.html" class="imghover"><img src="images/related-post-2.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-responsive"></a>
                                            </div>
                                            <div class="related-post-content">
                                                <h2 class="related-title"><a href="#" class="title">Survival Tips While Exploring
                                                        the World!</a></h2>
                                                <span class="meta-categories">In<a href="#">"Travel"</a></span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="related-post">
                                            <div class="related-img">
                                                <a href="blog-single.html" class="imghover"> <img src="images/related-post-3.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-responsive"> </a>
                                            </div>
                                            <div class="related-post-content">
                                                <h2><a href="#" class="title">The Ultimate singapore to do list</a></h2>
                                                <span class="meta-categories">In<a href="#" class="title">"Travel"</a></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--comments start-->
                    <div class="comment-area">
                        <div class="row">
                            <div class=" col-lg-12 col-md-12">
                                <div class="comment-title">
                                    <h2>(4)Comments</h2>
                                    <ul class="comment-list">
                                        <li>
                                            <div class="comment-author"><img src="images/comment-post-1.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                                            <div class="comment-info">
                                                <h4 class="user-title">Cassandra Craft</h4>
                                                <div class="meta">
                                                    <div class="comment-meta-date">31 March, 2017</div>
                                                </div>
                                                <div class="comment-content">
                                                    <p>Curabieet sitamet purus sed vestibulu ullam cursus, lacus eget pharetra accumsan ante metussent ultrices massa ligula. Duis mollis ultrices lectus a placerat. Fusce pretium dui sed dius natoque penatibus et magnis dis parturiet the iaculis etiam.</p>
                                                </div>
                                                <a href="#" class="reply-link">Reply</a> </div>
                                        </li>
                                    </ul>
                                    <ul class="comment-list">
                                        <li>
                                            <div class="comment-author"><img src="images/comment-post-2.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                                            <div class="comment-info">
                                                <h4 class="user-title">Stephen McDaniel</h4>
                                                <div class="meta"> <span class="comment-meta-date">28 March, 2017</span></div>
                                                <div class="comment-content">
                                                    <p>Praesent ultrices massa ligula. Duis mollis ultrices lectus a placerat. Fusce pretium dui sed diam faucibu varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus mauris odio.</p>
                                                </div>
                                                <a href="#" class="reply-link">Reply</a> </div>
                                            <ul class="comment-list childern">
                                                <li>
                                                    <div class="comment-author"><img src="images/comment-post-3.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                                                    <div class="comment-info">
                                                        <h4 class="user-title">Lester Sanders</h4>
                                                        <div class="meta"> <span class="comment-meta-date">10 March, 2017</span></div>
                                                        <div class="comment-content">
                                                            <p>Suscipit metus quis pharetra etpeisgetreruis mollis ultrices lectused diam faucibus celerci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus mrateget the iaculis etiam.</p>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a> </div>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="comment-list">
                                        <li>
                                            <div class="comment-author"><img src="images/comment-post-4.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                                            <div class="comment-info">
                                                <h4 class="user-title">Vicki Bouknight</h4>
                                                <div class="meta"> <span class="comment-meta-date">18 March, 2017</span></div>
                                                <div class="comment-content">
                                                    <p>Praesent ultrices massa ligula. Duis mollis ultrices lectus a placerat. Fusce pretium dui sed diam faucibus scelerisque. Orci varius natoquscetur rius mauris odio, dictum eu elementum ac, pretium eu dui.</p>
                                                </div>
                                                <a href="#" class="reply-link">Reply</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--comments close-->
                    <div class="leave-comments">
                        <h2 class="comment-title">Leave A Reply</h2>
                        <form>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="textarea">Comments</label>
                                        <textarea class="form-control" id="textarea" name="textarea" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input id="name" name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="website">Website</label>
                                        <input id="website" name="website" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

