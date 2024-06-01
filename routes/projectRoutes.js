const express = require('express');
const router = express.Router();
const Project = require('../models/Project');

router.get('/projects', async (req, res) => {
  const projects = await Project.find();
  res.json(projects);
});

router.post('/projects', async (req, res) => {
  const newProject = new Project(req.body);
  await newProject.save();
  res.json(newProject);
});

module.exports = router;
