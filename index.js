import React, { useState } from "react";
import Calendar from "react-calendar";
import "react-calendar/dist/Calendar.css";
import { Button, Card } from "@/components/ui";
import { motion } from "framer-motion";

const employees = {
  Kuchyně: ["Hanka", "Marie", "Martina", "Martin", "Renata"],
  Kurýři: ["Jirka", "Katka", "Michaela", "Pavel"],
  Bar: ["Jiřina", "Katka"],
};

const sectionColors = {
  Kuchyně: "#ffcc00",
  Kurýři: "#66ccff",
  Bar: "#ff6699",
};

export default function ShiftScheduler() {
  const [date, setDate] = useState(new Date());
  const [shifts, setShifts] = useState([]);
  const [password, setPassword] = useState("");

  const addShift = (name, section) => {
    setShifts([...shifts, { date, name, section }]);
  };

  const deleteShift = () => {
    if (password === "12345") {
      setShifts(shifts.filter((shift) => shift.date !== date));
    } else {
      alert("Nesprávné heslo!");
    }
  };

  return (
    <div className="p-6 bg-gray-100 min-h-screen">
      <h2 className="text-2xl font-bold text-center mb-4">Plánování směn</h2>
      <Calendar onChange={setDate} value={date} className="mb-4" />
      <div className="grid grid-cols-3 gap-4">
        {Object.keys(employees).map((section) => (
          <div key={section} className="p-4 rounded-xl" style={{ backgroundColor: sectionColors[section] }}>
            <h4 className="text-lg font-bold">{section}</h4>
            {employees[section].map((name) => (
              <motion.div key={name} whileHover={{ scale: 1.1 }} className="p-2 m-2 bg-white rounded shadow cursor-pointer"
                onClick={() => addShift(name, section)}>
                {name}
              </motion.div>
            ))}
          </div>
        ))}
      </div>
      <div className="mt-6">
        <h3 className="text-xl font-bold">Směny pro {date.toLocaleDateString()}</h3>
        {shifts.length ? (
          shifts
            .filter((shift) => shift.date.toDateString() === date.toDateString())
            .map((shift, index) => (
              <Card key={index} style={{ backgroundColor: sectionColors[shift.section] }}>
                {shift.name} - {shift.section}
              </Card>
            ))
        ) : (
          <p>Žádné směny</p>
        )}
      </div>
      <div className="mt-4">
        <input
          type="password"
          placeholder="Zadejte heslo pro mazání"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className="border p-2 rounded"
        />
        <Button onClick={deleteShift} className="ml-2">Smazat směny</Button>
      </div>
    </div>
  );
}
