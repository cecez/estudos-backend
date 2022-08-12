import mongoose from "mongoose";

mongoose.connect(
  "mongodb+srv://root:qaz123@cluster0.wffpqty.mongodb.net/backend-18"
);

let db = mongoose.connection;

export default db;
