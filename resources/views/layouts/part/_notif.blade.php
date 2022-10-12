<script type="text/javascript">
      var type = "{{ Session::get('alert-type', 'primary') }}";
      switch(type){
          case "primary":
                Toastify({
                    text: "{{ Session::get('message') }}",
                    duration: 5000,
                    avatar: "{{ asset('assets/images/info.svg') }}",
                    newWindow: true,
                    stopOnFocus: true,
                    close: true,
                    gravity: "{{ Session::get('gravity') }}",
                    position: "{{ Session::get('position') }}",
                    backgroundColor: "#0D6EFD",
                }).showToast()
              break;

          case "success":
            Toastify({
                    text: "{{ Session::get('message') }}",
                    duration: 5000,
                    avatar: "{{ asset('assets/images/info.svg') }}",
                    close: true,
                    gravity: "{{ Session::get('gravity') }}",
                    position: "{{ Session::get('position') }}",
                    backgroundColor: "#28A745",
            }).showToast()
              break;

          case "warning":
            Toastify({
                    text: "{{ Session::get('message') }}",
                    duration: 5000,
                    avatar: "{{ asset('assets/images/info.svg') }}",
                    close: true,
                    gravity: "{{ Session::get('gravity') }}",
                    position: "{{ Session::get('position') }}",
                    backgroundColor: "#FFC107",
            }).showToast()
              break;

          case "danger":
            Toastify({
                    text: "{{ Session::get('message') }}",
                    duration: 5000,
                    avatar: "{{ asset('assets/images/info.svg') }}",
                    close: true,
                    gravity: "{{ Session::get('gravity') }}",
                    position: "{{ Session::get('position') }}",
                    backgroundColor: "#DC3545",
            }).showToast()
              break;
      }
  </script>
