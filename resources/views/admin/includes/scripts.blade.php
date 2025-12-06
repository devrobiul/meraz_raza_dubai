<script src="{{ asset('admin/assets/js/jquery-3.5.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script src="{{ asset('admin/assets/js/chart.umd.js') }}"></script>
<script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script src="{{ asset('admin/assets/js/ajax.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
@stack('scripts')
<script>

    function confirmDelete(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }

    $('.select2').select2();

       $(document).ready(function() {
        $('.formSubmit').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#loadingPopup').show();
            $('.error-message').text('');

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#loadingPopup').hide();
               
                        window.location.href = response.route;
                   
                },
                error: function(xhr) {
                    $('#loadingPopup').hide();
                    let errors = xhr.responseJSON.errors || {};

                    if (xhr.responseJSON.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: xhr.responseJSON.error
                        });
                    } else {
                        $.each(errors, function(key, value) {
                            $(`#error-${key}`).text(value[0]);
                        });
                    }
                }
            });
        });
    });


</script>