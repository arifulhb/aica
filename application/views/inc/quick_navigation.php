
<!-- .aside -->
<aside class="bg-success dker aside-sm nav-vertical" id="nav">
    <section class="vbox">
        <header class="bg-black nav-bar">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
            <a href="<?php echo base_url().'admin';?>" title="AICA Admin" class="nav-brand">AICA</a> 
            <a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse"></a></header>
        <section class="w-f">
            <!-- nav -->
            <nav class="nav-primary hidden-xs">
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url().'quotation/add';?>">
                            <i class="icon-file-text"></i>
                            <span>New Quote</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- / nav -->
        </section>
        <footer class="footer bg-gradient hidden-xs">
            <a h href="<?php echo base_url().'user/signout';?>" class="btn btn-sm btn-link m-r-n-xs pull-right">
                <i class="icon-off"></i>
            </a>
            <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
                <i class="icon-reorder"></i>
            </a>
        </footer>
    </section>
</aside>
<!-- /.aside -->