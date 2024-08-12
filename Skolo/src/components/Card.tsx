// src/Card.js
import React, { useState } from "react";
import Dialog from "./Dialog";

function Card() {
  const [isDialogOpen, setIsDialogOpen] = useState(false);

  const openDialog = () => {
    setIsDialogOpen(true);
  };

  const closeDialog = () => {
    setIsDialogOpen(false);
  };

  return (
    <>
      <div className="bg-white rounded-md shadow-md p-4 flex justify-center items-center">
        <button
          onClick={openDialog}
          className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
        >
          <span className="text-2xl">+</span>
        </button>
      </div>
      <Dialog isOpen={isDialogOpen} onClose={closeDialog} />
    </>
  );
}

export default Card;
