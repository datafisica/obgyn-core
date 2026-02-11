import React from 'react';
import FullCalendar from '@fullcalendar/react';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

export default function Calendario() {
    console.log("El componente Calendario se ha cargado"); // Añade esto
    
    // Aquí definiremos las citas más adelante
    const eventos = [
        { title: 'Cita Juan Pérez', start: '2026-02-12T10:00:00' },
        { title: 'Cita María Gómez', start: '2026-02-14T14:30:00' }
    ];

    return (
        <div style={{ marginTop: '20px' }}>
             <FullCalendar
                plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
                initialView="dayGridMonth" // Vista inicial
                headerToolbar={{
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }}
                events={eventos} // Aquí irán las citas
                selectable={true}
                editable={true}
            />
         </div>
    );
}
