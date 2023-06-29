@extends('layouts.app')

@section('content')

<h3 class="page-title">Analysis</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">General Analysis</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Total number of Question</th>
                                            <th>Examinees</th>
                                            <th>Average Score</th>
                                            <th>Scored Below 50%</th>
                                            <th>Scored Above 50%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($examInfo)>0)
                                        @foreach($examInfo as $exam)
                                        <tr>
                                            <td>{{ $exam->exam_name }}</td>
                                            <td>{{$exam->checkQuestion($exam->id)}}</td>
                                            <td>{{$exam->resultCount($exam->id)}}</td>
                                             <td>{{number_format((float)$exam->studAverageResult($exam->id), 2,)}}</td>
                                            <td>{{$exam->belowFifthy($exam->id)}}</td>
                                           <td>{{$exam->aboveFifthy($exam->id)}}</td>
                                           
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        <div class="row">
         
    </div> 
   
</div>
</div>
</div>
@stop

