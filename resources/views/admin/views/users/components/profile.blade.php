<h5 class="card-title">{{ $user->full_name }}</h5>
@include('admin.fields.input', ['name' => 'first_name', 'value' => $user->first_name])
@include('admin.fields.input', ['name' => 'last_name', 'value' => $user->last_name])
@include('admin.fields.email', ['name' => 'email', 'value' => $user->email])
@include('admin.fields.number', ['name' => 'age', 'value' => $user->age])
@include('admin.fields.select', ['name' => 'gender', 'variants' => $genders, 'selected' => $user->gender])
@include('admin.fields.select', ['name' => 'status', 'variants' => $user_statuses, 'selected' => $user->status])
@include('admin.fields.select', ['name' => 'type', 'variants' => $user_types, 'selected' => $user->type])
