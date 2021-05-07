import React, { useState } from 'react';
import TodoForm from "./TodoForm";
import TodoList from "./TodoList";

function App() {

	//@TODO Laravelに通信して初期値を取得する
	const initialTodoList = []

	//Todoを取得する
	const [todoList, setTodoList] = useState(initialTodoList)

	//TodoFormから値を受け取る
	const handleAdd = (title) => {

		//useStateで配列を保存する時は、
		//新しい配列を生成して保存しないと再描画されない
		setTodoList([...todoList, title]);

		//@TODO Laravelに通信して追加分を保存する
		
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