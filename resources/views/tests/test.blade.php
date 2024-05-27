{{-- ファイル名は「○○.blade.php」とすること --}}
test<br>

{{-- bladeテンプレート --}}
@foreach($values as $value)
{{ $value->id }}<br>
{{ $value->text }}<br>
@endforeach

