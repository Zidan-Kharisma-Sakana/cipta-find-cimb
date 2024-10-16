import "./App.css";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import ErrorLayout from "./Modules/Layout/ErrorLayout";
import HomePage from "./Modules/Home/Pages/HomePage";
import DetailPage from "./Modules/Detail/Pages/DetailPage";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route index element={<HomePage />} />
        <Route path="detail/:kacab_id" element={<DetailPage />} />
        <Route path="detail" element={<Navigate to="/" />} />
        <Route path="*" element={<ErrorLayout />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
