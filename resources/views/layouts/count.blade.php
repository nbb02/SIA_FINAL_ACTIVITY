<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<style>
    .count {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-end;

        background-color: var(--secondary);
        width: 28%;
        height: 7.5rem;
        padding-right: 2rem;
        margin: 0 0.5rem;

        border-radius: 1.5rem;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
    }

    .count.resume {
        width: 24%;
    }

    .count.interview {
        width: 30%;
    }

    .image {
        position: absolute;
        left: 0;
        bottom: -45%;
    }

    .total {
        white-space: nowrap;
        cursor: default;
    }
</style>
<div class="count resume">
    <img class="image" src="{{ asset('icons/profiling.svg') }}" alt="Profiling" height="280">
    <h2 class="total">Total {{ $resumes->count() === 1 ? 'Resume' : 'Resumes' }}: {{ $resumes->count() }}</h2>
</div>

<div class="count hire">
    <img class="image" src="{{ asset('icons/hired.svg') }}" alt="Profiling" height="280">
    <h2 class="total">Total hires: 4,232</h2>
</div>

<div class="count interview">
    <img class="image" src="{{ asset('icons/interview.svg') }}" alt="Profiling" height="280">
    <h2 class="total">Total interviews: 2,002</h2>
</div>

<div class="count apply">
    <img class="image" src="{{ asset('icons/applied.svg') }}" alt="Profiling" height="280">
    <h2 class="total">Total applications: 507</h2>
</div>

<div class="count other">
    <img class="image" src="{{ asset('icons/other.svg') }}" alt="Profiling" height="280">
    <h2 class="total">Total others: 4,232</h2>
</div>