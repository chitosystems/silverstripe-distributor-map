
<div class="row">

    <div class="col-sm-12">
        <!-- Main Page Content -->
        <div id="main-page-content" class="section-container main-page-content clearfix">
            <div class="section-content">
                <h1 class="page_title">{$Title}</h1>
                {$Content}

                <div id="AddButtonText">
                    <% if $AllowAddingDistributors %>
                        <a href="$Link(add/)" class="btn btn-default"><% $AddButtonText %>$AddButtonText<% else %>Add Distributors<% end_if %></a>
                    <% end_if %>
                </div>

                <div style="margin: 50px 0;">
                    <section id="map-container">
                        <div id="DistributorMap">
                            <div id="mapWrapper" class="mb30"></div>
                        </div>
                    </section>
                </div>

                <% if $AllowAddingDistributors %>
                <div id="DistributorForm">
                    $DistributorForm
                </div>
                <% end_if %>
            </div>
            <!-- .section-content -->
        </div>
        <!-- .section-container -->
    </div>
    <!-- .col-sm-8 -->
</div>