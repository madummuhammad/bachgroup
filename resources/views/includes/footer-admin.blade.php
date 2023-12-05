      @php
      use App\Models\Footer;
        $item=Footer::get()->first();
      @endphp

      <footer class="footer">
        <div><div>{{$item->copyright}}</div>
      </footer>