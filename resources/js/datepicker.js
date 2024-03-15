import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';
import localeEn from 'air-datepicker/locale/en';

const datePicker = (id) => {
    return new AirDatepicker(`${id}`, {
        locale: localeEn,
        inline: false,
        timepicker: true,
        dateFormat: "MM/dd/yyyy",
        timeFormat: "HH:mm"
    });
}

const minMaxDatePicker = (minDateEl, maxDateEl, inline=false) => {
    let dpMin, dpMax;
    dpMin = new AirDatepicker(`${minDateEl}`, {
        locale: localeEn,
        inline: inline,
        timepicker: true,
        dateFormat: "MM/dd/yyyy",
        timeFormat: "HH:mm",
        minDate: new Date(),
        onSelect({date}) {
            dpMax.update({
                minDate: date
            })
        }
    });

    dpMax = new AirDatepicker(`${maxDateEl}`, {
        locale: localeEn,
        inline: inline,
        timepicker: true,
        dateFormat: "MM/dd/yyyy",
        timeFormat: "HH:mm",
        minDate: new Date(),
        onSelect({date}) {
            dpMin.update({
                maxDate: date
            })
        }
    });

    return { dpMin, dpMax }
}

window.datePicker = datePicker;
window.minMaxDatePicker = minMaxDatePicker;
