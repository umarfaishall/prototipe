<x-app-layout>
    <div class="flex items-center gap-2">
      <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ url()->previous() }}">
        <i class="fas fa-arrow-left"></i>
      </a>
      <h1 class="my-5 text-2xl font-bold">Tugas Harian</h1>
    </div>
    <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg" action="{{ route('korlap.tugas.update', $activity->id ) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-1 flex-col gap-4">
        @foreach ($details as $detail)
          <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
            <label for="date" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Tanggal Aktivitas</label>
            <input type="text" id="activity_date"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
              placeholder="Tangal Aktivitas" name="activity_date[]" value="{{ date('d F Y', strtotime($detail->activity_date)) }}" readonly/>
          </div>
          {{-- text area deskripsi kegiatan --}}
          <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
            <label for="description" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Deskripsi</label>
            <textarea id="description"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
              placeholder="description" name="description[]" required>{{ $detail->description }}</textarea>

          </div>
        @endforeach
        <div class="ms-auto flex">
          <button type="submit"
            class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
            Update
          </button>
        </div>
      </div>
    </form>
  </x-app-layout>

{{-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Evaluasi</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('korlap.tugas.update', $activity->id) }}">
                            @csrf

                            @foreach($dates as $date)
                                <div class="form-group">
                                    <label for="date">{{ $date }}</label>
                                    <textarea name="descriptions[{{ $date }}]" class="form-control" id="description">{{ $descriptions[$date]->description ?? '' }}</textarea>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Update Evaluasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
  