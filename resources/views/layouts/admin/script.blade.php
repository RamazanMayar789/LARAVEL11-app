    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/admin/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/admin/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/admin/src/plugins/src/waves/waves.min.js"></script>
    <script src="/admin/layouts/vertical-dark-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="/admin/src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="/admin/src/assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
     <script src="/admin/src/assets/js/scrollspyNav.js"></script>
    <script src="/admin/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="/admin/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    window.addEventListener('success', function(event) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: event.detail,
        showConfirmButton: false,

        timer: 1500
    })
    })

</script>

<script>

    window.addEventListener('deleteshow', function(event) {
   Swal.fire({
  title: "آیا شما مطمین هستید",
  text: "شما قادر به بازگشت شان نیستید",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "بلی, حذف شود!",
  cancelButtonText:'لغو'
}).then((result) => {
  if (result.isConfirmed) {
   Livewire.dispatch('deleteconfirmated');
  }
})
    })

</script>
