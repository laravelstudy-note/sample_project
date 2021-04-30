import React, { useState } from 'react';
import TodoForm from "./TodoForm";
import TodoList from "./TodoList";

function App() {

	//Todoを取得する
	const [todoList, setTodoList] = useState([])

	//TodoFormから値を受け取る
	const handleAdd = (title) => {

		//useStateで配列を保存する時は、
		//新しい配列を生成して保存しないと再描画されない
		setTodoList([...todoList, title]);
		
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
								items={ todoList }
								/>
						</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App;