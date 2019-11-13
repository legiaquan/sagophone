<form action= "{{route('postForm')}}" method= "post" >
{{ csrf_field() }}
 Tên: <input type= "text" name = "name" ></br>
 Tuổi: <input type= "text" name = "age" >
 </br>
 <input type= "submit" >
</form>
