@props(['label', 'name', 'value', 'unit'])

<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-3 col-form-label">{{ $label }}</label>
    <div class="col-md-3 col-lg-2">
        <input type="number" name="{{ $name }}" class="form-control" id="{{ $name }}"
            value="{{ $value }}" required>
    </div>

    <div class="col-md-3 col-lg-2">
        <select name="{{ $name }}_unit" id="{{ $name }}_unit" class="form-select">
            <option value="hours" {{ $unit == 'hours' ? 'selected' : '' }}>Horas</option>
            <option value="days" {{ $unit == 'days' ? 'selected' : '' }}>Días</option>
            <option value="weeks" {{ $unit == 'weeks' ? 'selected' : '' }}>Semanas</option>
            <option value="months" {{ $unit == 'months' ? 'selected' : '' }}>Meses</option>
        </select>
    </div>
</div>