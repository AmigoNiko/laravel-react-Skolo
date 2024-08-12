// src/App.js
import React from 'react';
import './App.css';
import Header from './components/Header';
import Card from './components/Card';

function App() {
  const cardCount = 9;

  return (
    <div className="">
      <Header />
      <div className="grid grid-cols-3 gap-4">
        {Array.from({ length: cardCount }).map((_, index) => (
          <Card key={index} />
        ))}
      </div>
    </div>
  );
}

export default App;
