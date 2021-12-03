<div>
<div>
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Subject') }}    
  </h2>

  <span class="text-sm text-gray-600 pt-2"> Code: {{ $subjects->code }}</span>
    
  <nav class="my-6 flex items-center gap-4">

    <button wire:click.defer="task" class="font-bold text-gray-600 pb-2 text-md @if ($show === 'task')border-b-2 @endif border-indigo-700" >Task</buton>
    <button wire:click.defer="file" class="font-bold text-gray-600 pb-2 text-md @if ($show === 'file')border-b-2 @endif border-indigo-700" >File</button>
    
    @if(Auth::user()->hasRole('teacher'))
    <button wire:click.defer="student" class="font-bold text-gray-600 pb-2 text-md @if ($show === 'student')border-b-2 @endif border-indigo-700" >Student</button>
    @endif
    
  </nav>

    @if ($show === 'file')
    <livewire:teacher-links.files-teacher :subject="$subject"/>
    @elseif ($show === 'task')
    <livewire:teacher-links.task-teacher :subject="$subject"/>
    @elseif ($show === 'student')
    <livewire:teacher-links.student-class :subject="$subject"/>
    @endif

</div>

