<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>
<script>
function toggleInputText() {
  var jenisIzinInput = document.getElementById("jenis_izin_lainnya");
  if (document.getElementById("jenis_izin1").value === "lainnya") {
    jenisIzinInput.classList.remove("d-none");
  } else {
    jenisIzinInput.classList.add("d-none");
  }
}
</script>
<script>
  var password_baru = document.getElementById("password_baru");
  var konfirmasi_password_baru = document.getElementById("konfirmasi_password_baru");
function validatePassword(){
  if(password_baru.value != konfirmasi_password_baru.value) {
    konfirmasi_password_baru.setCustomValidity("Password tidak sesuai");
  } else {
    konfirmasi_password_baru.setCustomValidity('');
  }
}
password_baru.onchange = validatePassword;
konfirmasi_password_baru.onkeyup = validatePassword;
</script>

<script>
  function hanyaAngka(event) {
  var angka = (event.which) ? event.which : event.keyCode;
  if (angka > 31 && (angka < 48 || angka > 57)) {
    return false;
  }
  return true;
}
</script>

<script>
  var buttonScrollToTop = document.getElementById("scroll-to-top");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    buttonScrollToTop.style.display = "block";
  } else {
    buttonScrollToTop.style.display = "none";
  }
}

buttonScrollToTop.addEventListener("click", function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});
</script>