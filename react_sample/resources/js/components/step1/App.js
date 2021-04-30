import React from 'react';
import TodoForm from "./TodoForm";
import TodoList from "./TodoList";

function App() {

	//TodoFormから値を受け取る
	const handleAdd = (title) => {
		alert(title);
	};

	return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">ToDo App</div>

                        <div className="card-body">
							<TodoForm 
								handleAdd={ handleAdd }
								/>
							<TodoList 
								/>
						</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App;