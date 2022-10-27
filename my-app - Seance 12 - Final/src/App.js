import { useState, useEffect } from 'react'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Header from './components/Header'
import Tasks from './components/Tasks'
import AddTask from './components/AddTask'
import Footer from './components/Footer'
import About from './components/About'

const App = () => {

const [tasks, setTasks] = useState([])

useEffect(()=> {
  const getTasks = async () => {
    const tasksFromServer = await fetchTasks()
    setTasks(tasksFromServer)
  }
  getTasks()
}, [])

const fetchTasks = async () => {
  const res = await fetch('http://localhost:5000/tasks')
  const data = await res.json()
  //console.log(data)
  return data
}

const deleteTask = async (id) => {
  //console.log(id)
  await fetch(`http://localhost:5000/tasks/${id}`, {
    method: 'DELETE'
  })
  setTasks(tasks.filter((task) => task.id !== id))
}

//fetch Task
const fetchTask = async (id) => {
  const res = await fetch(`http://localhost:5000/tasks/${id}`)
  const data = await res.json()
  //console.log(data)
  return data
}
const toggleReminder = async (id) => {
  const taskToToggle = await fetchTask(id)
  const updTask = { ...taskToToggle, reminder: !taskToToggle.reminder}

  const res = await fetch(`http://localhost:5000/tasks/${id}`,{
  method: 'PUT',
  headers: {
    'Content-type': 'application/json'
  },
  body: JSON.stringify(updTask)
})
const data = await res.json() 
  setTasks(tasks.map((task) => task.id === id ? { ...task, reminder:data.reminder} : task))
}

const addTask = async (task) =>{
  const res = await fetch('http://localhost:5000/tasks', {
    method: 'POST',
    headers: {
      'Content-type': 'application/json'
    },
    body: JSON.stringify(task)
  })
  const newTask = await res.json()
  setTasks([...tasks, newTask])
}

const [showAddTask, setShowAddTask] = useState(false)
  return (
    <BrowserRouter>
      <div className="container">
          <Header title="Tasks list" onAdd={() => setShowAddTask(!showAddTask)} showAdd={showAddTask}/>
          { showAddTask && <AddTask onAdd={ addTask }  /> }
          {tasks.length > 0 ?(
            <Routes>
              <Route path='/' element={<Tasks tasks={tasks} onDelete={ deleteTask } onToggle={ toggleReminder } />} />
            </Routes>
            
          ):(
            'No task to show'
          )}
          <Routes>
            <Route path='/about' element={<About />}/>
          </Routes>
          <Footer />
      </div>
    </BrowserRouter>
  );
}

export default App;
