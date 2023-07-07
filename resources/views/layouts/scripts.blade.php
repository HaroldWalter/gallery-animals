@section('scripts')
<script>
   (() => {

      // Variables
      const headers = {
         'X-CSRF-TOKEN': '{{ csrf_token() }}',
         'Content-Type': 'application/json',
         'Accept': 'application/json',
         'X-Requested-With': 'XMLHttpRequest'
      }

      // Prepare show comments
      const prepareShowComments = e => {
         e.preventDefault();

         document.getElementById('showbutton').toggleAttribute('hidden');
         document.getElementById('showicon').toggleAttribute('hidden');
         showComments();
      }

      // Show comments
      const showComments = async () => {

         // Send request
         const response = await fetch(`{{ route('
            post.comments ', $post->id) }}`, {
               method: 'GET',
               headers: headers
            });

         // Wait for response
         const data = await response.json();

         document.getElementById('commentsList').innerHTML = data.html;
      }

      // Listener wrapper
      const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
         const element = document.querySelector(selector);
         if (element) {
            document.querySelector(selector).addEventListener(type, e => {
               if (eval(condition)) {
                  callback(e);
               }
            }, capture);
         }
      };

      // Set listeners
      window.addEventListener('DOMContentLoaded', () => {
         wrapper('#showcomments', 'click', prepareShowComments);
      })

   })()
</script>
@endsection