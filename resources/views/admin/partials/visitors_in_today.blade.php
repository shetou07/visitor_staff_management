<table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>National ID Number</th>
                    <th>Purpose</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->email }}</td>
                        <td>{{ $visitor->phone }}</td>
                        <td>{{ $visitor->vehicle}}</td>
                        <td>{{ $visitor->purpose }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
