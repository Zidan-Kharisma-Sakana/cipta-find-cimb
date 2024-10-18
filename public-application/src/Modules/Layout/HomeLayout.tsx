// import CIMB from "../../assets/cimb.png";
import React from "react";
import CIMB from "./CIMB";

const HomeLayout: React.FC<{ children: React.ReactNode; home?: boolean }> = ({ children, home = false }) => {
  return (
    <main>
      <div className="w-full flex justify-between items-center px-6 py-4 min-h-16 fixed left-0 top-0 z-50 bg-gradient-to-r from-cimbSecondary200 to-cimbSecondary300">
        {home ? (
          <div className="cursor-pointer">
            <div className="mb-1 w-6 h-1 rounded-full bg-white" />
            <div className="translate-x-1.5 mb-1 w-6 h-1 rounded-full bg-white" />
            <div className="w-6 h-1 rounded-full bg-white" />
          </div>
        ) : (
          <div />
        )}
        <CIMB />
      </div>
      <section className="w-full h-screen">
        <div className="mt-16">{children}</div>
      </section>
    </main>
  );
};
export default HomeLayout;
