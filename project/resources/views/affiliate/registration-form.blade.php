<form action="{{route('affiliate-register')}}" method="post">
    {{ csrf_field() }}
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <input type="submit">
</form>