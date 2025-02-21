export default () => ({
    datePickerOpen: false,
    datePickerSelectingYear: false,
    datePickerValue: "",
    datePickerFormat: "M d, Y",
    datePickerMonth: "",
    datePickerYear: "",
    datePickerDay: "",
    datePickerDaysInMonth: [],
    datePickerBlankDaysInMonth: [],
    datePickerMonthNames: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ],
    datePickerDays: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    datePickerYearRange: [],

    datePickerDayClicked(day) {
        let selectedDate = new Date(
            this.datePickerYear,
            this.datePickerMonth,
            day
        );
        this.datePickerDay = day;
        this.datePickerValue = this.datePickerFormatDate(selectedDate);
        this.datePickerOpen = false;
    },

    datePickerPreviousMonth() {
        if (this.datePickerMonth == 0) {
            this.datePickerYear--;
            this.datePickerMonth = 11;
        } else {
            this.datePickerMonth--;
        }
        this.datePickerCalculateDays();
    },

    datePickerNextMonth() {
        if (this.datePickerMonth == 11) {
            this.datePickerMonth = 0;
            this.datePickerYear++;
        } else {
            this.datePickerMonth++;
        }
        this.datePickerCalculateDays();
    },

    datePickerIsSelectedDate(day) {
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return this.datePickerValue === this.datePickerFormatDate(d);
    },

    datePickerIsToday(day) {
        const today = new Date();
        const d = new Date(this.datePickerYear, this.datePickerMonth, day);
        return today.toDateString() === d.toDateString();
    },

    datePickerCalculateDays() {
        let daysInMonth = new Date(
            this.datePickerYear,
            this.datePickerMonth + 1,
            0
        ).getDate();
        let dayOfWeek = new Date(
            this.datePickerYear,
            this.datePickerMonth
        ).getDay();

        this.datePickerBlankDaysInMonth = Array.from(
            { length: dayOfWeek },
            (_, i) => i + 1
        );
        this.datePickerDaysInMonth = Array.from(
            { length: daysInMonth },
            (_, i) => i + 1
        );
    },

    datePickerFormatDate(date) {
        let formattedDay = this.datePickerDays[date.getDay()];
        let formattedDate = ("0" + date.getDate()).slice(-2);
        let formattedMonth = this.datePickerMonthNames[date.getMonth()];
        let formattedMonthShort = formattedMonth.substring(0, 3);
        let formattedMonthNumber = ("0" + (date.getMonth() + 1)).slice(-2);
        let formattedYear = date.getFullYear();

        switch (this.datePickerFormat) {
            case "MM-DD-YYYY":
                return `${formattedMonthNumber}-${formattedDate}-${formattedYear}`;
            case "DD-MM-YYYY":
                return `${formattedDate}-${formattedMonthNumber}-${formattedYear}`;
            case "YYYY-MM-DD":
                return `${formattedYear}-${formattedMonthNumber}-${formattedDate}`;
            case "D d M, Y":
                return `${formattedDay} ${formattedDate} ${formattedMonthShort} ${formattedYear}`;
            default:
                return `${formattedMonthShort} ${formattedDate}, ${formattedYear}`;
        }
    },

    datePickerToggleYearSelection() {
        this.datePickerSelectingYear = !this.datePickerSelectingYear;
        if (this.datePickerSelectingYear) {
            this.datePickerGenerateYearRange();
        }
    },

    datePickerGenerateYearRange() {
        let currentYear = new Date().getFullYear();
        let startYear = currentYear - 50;
        this.datePickerYearRange = Array.from(
            { length: currentYear - startYear + 1 },
            (_, i) => startYear + i
        );
    },

    datePickerSetYear(year) {
        this.datePickerYear = year;
        this.datePickerSelectingYear = false;
        this.datePickerCalculateDays();
    },

    init(value = undefined, format = "M d, Y") {
        let currentDate = new Date();
        this.datePickerMonth = currentDate.getMonth();
        this.datePickerYear = currentDate.getFullYear();
        this.datePickerDay = currentDate.getDay();
        this.datePickerValue = value;
        this.datePickerCalculateDays();

        this.datePickerFormat = format;
    },

    close() {
        this.datePickerOpen = false;
    },

    toggle() {
        this.datePickerOpen = !this.datePickerOpen;
    },
});
