<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employers</title>

    <body>
        @if (isset($employers) && count($employers))
            @foreach($employers as $employee)
                <div class="employee-box">
                    <span>
                        {{ $employee->imie }}
                    </span>
                    <span>
                        {{ $employee->nazwisko }}
                    </span>
                </div>
            @endforeach
        @else
            <h2>
                Sorry, no employers found... ;(
            </h2>
        @endif
    </body>
</html>
