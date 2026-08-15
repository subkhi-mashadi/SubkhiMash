@php
    $githubUsername = 'subkhi-mashadi';
    $currentYear = (int) now()->year;
    $availableYears = [$currentYear, $currentYear - 1, $currentYear - 2, $currentYear - 3];
@endphp

<section
    id="github"
    class="py-24 border-t border-neutral-200 dark:border-white/5 bg-neutral-50 dark:bg-neutral-900/30"
    x-data="{
        year: {{ $currentYear }},
        years: {{ Illuminate\Support\Js::from($availableYears) }},
        total: null,
        cells: [],
        loading: true,
        languages: [],
        languagesLoading: true,
        async loadLanguages() {
            try {
                const res = await fetch('{{ route('github.languages') }}');
                this.languages = await res.json();
            } catch (e) {
                this.languages = [];
            }
            this.languagesLoading = false;
        },
        levelClasses: [
            'bg-neutral-200 dark:bg-white/10',
            'bg-indigo-200 dark:bg-indigo-900',
            'bg-indigo-300 dark:bg-indigo-700',
            'bg-indigo-400 dark:bg-indigo-500',
            'bg-indigo-600 dark:bg-indigo-400',
        ],
        async load(y) {
            this.loading = true;
            this.year = y;
            try {
                const res = await fetch(`{{ route('github.contributions') }}?year=${y}`);
                const data = await res.json();
                this.total = data.total;
                this.cells = data.cells;
            } catch (e) {
                this.total = null;
                this.cells = [];
            }
            this.loading = false;
        },
        firstDate() {
            if (!this.cells.length) return null;
            const min = this.cells.reduce((min, c) => (c.date < min ? c.date : min), this.cells[0].date);
            // Selaraskan ke hari Minggu sebelumnya, biar kolom minggu match kalender asli GitHub (Minggu-Sabtu).
            const d = new Date(min + 'T00:00:00Z');
            d.setUTCDate(d.getUTCDate() - d.getUTCDay());
            return d;
        },
        weekIndex(date) {
            const d0 = this.firstDate();
            if (!d0) return 0;
            const d1 = new Date(date + 'T00:00:00Z');
            return Math.floor((d1 - d0) / (7 * 24 * 60 * 60 * 1000));
        },
        dayIndex(date) {
            return new Date(date + 'T00:00:00Z').getUTCDay();
        },
        weekCount() {
            if (!this.cells.length) return 1;
            return Math.max(...this.cells.map((c) => this.weekIndex(c.date))) + 1;
        },
        monthLabels() {
            if (!this.cells.length) return [];
            const sorted = [...this.cells].sort((a, b) => (a.date < b.date ? -1 : 1));
            const labels = [];
            let lastMonth = null;
            sorted.forEach((c) => {
                const d = new Date(c.date + 'T00:00:00Z');
                const m = d.getUTCMonth();
                if (m !== lastMonth) {
                    labels.push({ label: d.toLocaleDateString('en-US', { month: 'short', timeZone: 'UTC' }), week: this.weekIndex(c.date) });
                    lastMonth = m;
                }
            });
            return labels;
        },
    }"
    x-init="load(year); loadLanguages()"
>
    <div class="max-w-5xl mx-auto px-6">
        <p class="reveal text-indigo-500 dark:text-indigo-400 font-medium mb-2 text-center">{{ __('portfolio.github.label') }}</p>
        <h2 class="reveal text-3xl font-bold mb-4 text-center">{{ __('portfolio.github.title') }}</h2>
        <p class="reveal text-neutral-600 dark:text-neutral-400 text-center mb-12">{{ __('portfolio.github.subtitle') }}</p>

        <div class="reveal w-full rounded-2xl border border-neutral-200 dark:border-white/10 bg-white dark:bg-neutral-950/40 p-6 mb-6">
            <p x-show="languagesLoading" class="text-center text-sm text-neutral-500 py-4">…</p>
            <div x-show="!languagesLoading" class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4">
                <template x-for="lang in languages" :key="lang.name">
                    <div>
                        <div class="flex justify-between text-xs mb-1.5">
                            <span class="font-medium text-neutral-700 dark:text-neutral-200" x-text="lang.name"></span>
                            <span class="text-neutral-500" x-text="lang.percent + '%'"></span>
                        </div>
                        <div class="h-1.5 rounded-full bg-neutral-100 dark:bg-white/10 overflow-hidden">
                            <div class="h-full rounded-full" :style="`width: ${Math.max(lang.percent, 2)}%; background-color: ${lang.color};`"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <div class="reveal flex justify-center gap-2 mb-4">
            <template x-for="y in years" :key="y">
                <button
                    type="button"
                    @click="load(y)"
                    :class="y === year ? 'bg-neutral-900 dark:bg-white text-white dark:text-neutral-950 border-transparent' : 'border-neutral-200 dark:border-white/10 text-neutral-600 dark:text-neutral-300'"
                    class="px-3 py-1 rounded-full text-xs font-medium border transition"
                    x-text="y"
                ></button>
            </template>
        </div>

        <p class="reveal text-center mb-4 h-8">
            <template x-if="!loading">
                <span>
                    <span class="text-3xl font-bold" x-text="total ?? '—'"></span>
                    <span class="text-neutral-500 dark:text-neutral-400 text-sm ml-1">
                        {{ __('portfolio.github.contributions_suffix') }} <span x-text="year"></span>
                    </span>
                </span>
            </template>
        </p>

        <div class="reveal w-full rounded-2xl border border-neutral-200 dark:border-white/10 bg-white dark:bg-neutral-950/40 p-4">
            <p x-show="loading" class="text-center text-sm text-neutral-500 py-8">…</p>
            <div x-show="!loading">
                <div class="grid mb-1" :style="`grid-template-columns: repeat(${weekCount()}, minmax(0,1fr)); height: 14px;`">
                    <template x-for="m in monthLabels()" :key="m.label + m.week">
                        <span class="text-xs text-neutral-500 overflow-hidden" :style="`grid-column: ${m.week + 1} / -1; grid-row: 1;`" x-text="m.label"></span>
                    </template>
                </div>
                <div class="grid gap-[3px]" :style="`grid-template-columns: repeat(${weekCount()}, minmax(0,1fr)); grid-template-rows: repeat(7, 1fr); height: 91px;`">
                    <template x-for="cell in cells" :key="cell.date">
                        <div
                            :class="levelClasses[cell.level]"
                            class="rounded-xs"
                            :style="`grid-column: ${weekIndex(cell.date) + 1}; grid-row: ${dayIndex(cell.date) + 1};`"
                            :title="cell.date"
                        ></div>
                    </template>
                </div>
            </div>
        </div>

        <div class="reveal text-center mt-8">
            <a href="https://github.com/{{ $githubUsername }}" target="_blank" class="text-sm text-neutral-600 dark:text-neutral-300 hover:text-neutral-900 dark:hover:text-white transition">
                &commat;{{ $githubUsername }} on GitHub →
            </a>
        </div>
    </div>
</section>
