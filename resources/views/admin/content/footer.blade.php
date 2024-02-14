<footer class="page-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">ColoredStrategies 2019</p>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ul class="breadcrumb pt-0 pr-0 float-right">
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Review</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Purchase</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Docs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php  $langs = App\Models\Language::get(); ?>
    <input type="hidden" id="langs" data-value="{{$langs}}">
   
    <script type="text/javascript">
        var base_url = '{{ URL::to("/") }}';
        var langs    =  $('#langs').data('value');
       
    </script>
    
    <script src="{{ URL::to('assets/admin') }}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/Chart.bundle.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/chartjs-plugin-datalabels.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/moment.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/fullcalendar.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/datatables.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/progressbar.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/jquery.barrating.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/select2.full.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/nouislider.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/bootstrap-datepicker.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/Sortable.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/mousetrap.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/vendor/glide.min.js"></script>
    
    <script src="{{ URL::to('assets/admin') }}/js/dore.script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js"></script>
    <script src="{{ URL::to('assets/admin') }}/js/scripts.js"></script>
</body>

</html>