<form action="" method="POST" class="ItemDestroyForm hidden">
    {{ csrf_field() }}
    {{method_field('DELETE')}}
</form>