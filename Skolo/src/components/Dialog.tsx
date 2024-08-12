import React, { useState, useEffect, useRef } from "react";
import axios from "axios";

interface DialogProps {
  isOpen: boolean;
  onClose: () => void;
}

const Dialog: React.FC<DialogProps> = ({ isOpen, onClose }) => {
  const [selectedColor, setSelectedColor] = useState("red");
  const [title, setTitle] = useState("Google");
  const [link, setLink] = useState("https://google.com");
  const dialogRef = useRef<HTMLDivElement>(null);

  const colors = [
    { name: "Red", class: "text-red-500" },
    { name: "Green", class: "text-green-500" },
    { name: "Blue", class: "text-blue-500" },
    { name: "Yellow", class: "text-yellow-500" },
  ];

  useEffect(() => {
    function handleClickOutside(event: MouseEvent) {
      if (dialogRef.current && !dialogRef.current.contains(event.target as Node)) {
        onClose();
      }
    }

    if (isOpen) {
      document.addEventListener("mousedown", handleClickOutside);
    } else {
      document.removeEventListener("mousedown", handleClickOutside);
    }

    return () => {
      document.removeEventListener("mousedown", handleClickOutside);
    };
  }, [isOpen, onClose]);

  const handleSubmit = async () => {
    try {
      const response = await axios.post("http://127.0.0.1:8000/userInformation", {
        name: title,
        path: link,
        color: selectedColor,
      });
      console.log(response.data); // Success message or data
      onClose(); // Close the dialog after successful submission
    } catch (error) {
      console.error("Error creating user information:", error);
    }
  };

  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
      <div ref={dialogRef} className="bg-white p-6 rounded-md w-96">
        <div className="mb-4">
          <label className="block font-semibold mb-2">Title:</label>
          <input
            type="text"
            value={title}
            onChange={(e) => setTitle(e.target.value)}
            className="w-full border border-gray-300 rounded-md p-2"
          />
        </div>
        <div className="mb-4">
          <label className="block font-semibold mb-2">Link:</label>
          <input
            type="text"
            value={link}
            onChange={(e) => setLink(e.target.value)}
            className="w-full border border-gray-300 rounded-md p-2"
          />
        </div>
        <div className="mb-4">
          <label className="block font-semibold mb-2">Color:</label>
          <div className="relative">
            <select
              value={selectedColor}
              onChange={(e) => setSelectedColor(e.target.value)}
              className={`w-full border border-gray-300 rounded-md p-2 ${colors.find(c => c.name.toLowerCase() === selectedColor)?.class}`}
            >
              {colors.map((color) => (
                <option
                  key={color.name}
                  value={color.name.toLowerCase()}
                  className={`${color.class}`}
                >
                  {color.name}
                </option>
              ))}
            </select>
          </div>
        </div>
        <button
          onClick={handleSubmit}
          className="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md"
        >
          Submit
        </button>
        <button
          onClick={onClose}
          className="mt-4 bg-gray-500 text-white py-2 px-4 rounded-md ml-2"
        >
          Close
        </button>
      </div>
    </div>
  );
};

export default Dialog;
