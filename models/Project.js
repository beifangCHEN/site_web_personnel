const mongoose = require('mongoose');

const projectSchema = new mongoose.Schema({
  title: String,
  description: String,
  url: String,
  date: Date,
});

module.exports = mongoose.model('Project', projectSchema);
