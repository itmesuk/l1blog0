@foreach ($all_students as $student)
    Name: {{ $student->name }}
    <br>
    Email: {{ $student->email }}
    <br>
    @foreach ($student->rPhone as $stdPhones)
        Phone: {{ $stdPhones->phone }} <br>
    @endforeach
    <hr>
@endforeach
