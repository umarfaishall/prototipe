<x-home-layout>
  <section class="flex flex-col gap-5">
    <h1 class="text-2xl font-bold">Aktivitas Membutuhkan Bantuan</h1>
    <div class="flex grow flex-wrap gap-4">
      @foreach ($activities as $activity)
        <x-collaboration-card :id="$activity->id" :title="$activity->activity_name" :startDate="$activity->start_date" :endDate="$activity->end_date" :domicile="$activity->domicile"
          :imagePath="$activity->image_path" />
      @endforeach
    </div>
    <div class="me-5">
      <x-pagination :paginator="$activities" />
    </div>
  </section>
</x-home-layout>
