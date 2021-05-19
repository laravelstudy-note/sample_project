import React, { useState, useEffect } from 'react';
import TodoForm from "./TodoForm";
import TodoList from "./TodoList";
import Todo from "./Todo";

//初期値
function load_todo(callback){
	
	//参考: https://ja.reactjs.org/docs/faq-ajax.html
	
	fetch(TODO_API_LIST)
      .then(res => res.json())
      .then(

        (result) => {
          callback(result.items.map((item) => {
			return new Todo(item.title, item.todo_status);
		  }));
        },
        // 補足：コンポーネント内のバグによる例外を隠蔽しないためにも
        // catch()ブロックの代わりにここでエラーハンドリングすることが重要です
        (error) => {
          alert("エラーが発生しました")
        }
      );

}

function add_todo(title, callback){

	//送信するデータ
	const data = { 
		title : title
	};

	fetch(TODO_API_CREATE, {
		method: 'POST',
		body: JSON.stringify(data),	//送信データをJSONに変換する,
		headers: {
			'X-CSRF-TOKEN': TODO_API_CSRF,
			'Content-Type': 'application/json'
		}
	})
	.then(res => res.json())
    .then(

        (result) => {
          callback(new Todo(result.item.title, result.item.todo_status));
		},
        
		(error) => {
          alert("エラーが発生しました")
        }
	);

}

function update_todo(title, value, callback){

	//送信するデータ
	const data = { 
		title : title,
		value : value
	};

	fetch(TODO_API_FINISH, {
		method: 'POST',
		body: JSON.stringify(data),	//送信データをJSONに変換する,
		headers: {
			'X-CSRF-TOKEN': TODO_API_CSRF,
			'Content-Type': 'application/json'
		}
	})
	.then(res => res.json())
    .then(

        (result) => {
			callback(result.items.map((item) => {
				return new Todo(item.title, item.todo_status);
			}));
		},
       
		(error) => {
          alert("エラーが発生しました")
        }
	);
}

function clear_todo(callback){

	//送信するデータ
	const data = { 
		
	};

	fetch(TODO_API_CLEAR, {
		method: 'POST',
		body: JSON.stringify(data),	//送信データをJSONに変換する,
		headers: {
			'X-CSRF-TOKEN': TODO_API_CSRF,
			'Content-Type': 'application/json'
		}
	})
	.then(res => res.json())
    .then(

        (result) => {
			callback(result.items.map((item) => {
				return new Todo(item.title, item.todo_status);
			}));
		},
       
		(error) => {
          alert("エラーが発生しました")
        }
	);
}


function App() {

	//Todoを取得する
	const [todoList, setTodoList] = useState([])

	//TodoFormから値を受け取る
	const handleAdd = (title) => {

		//新しく追加するtodo
		const todo = new Todo(title, 0);

		//通信を行う
		add_todo(title, (ret) => {
			console.log("callback add todo", ret);

			//通信に成功した時にstateを更新する
			//useStateで配列を保存する時は、
			//新しい配列を生成して保存しないと再描画されない
			setTodoList([...todoList, todo]);
		});
		
	};

	//TodoListから値を受け取る
	const handleChange = (id, title, nextValue) => {

		//更新する
		const target = todoList.find((todo) => { return todo.title == title })
		if(target){
			target.status = (nextValue) ? 1 : 0;
		}

		//値を更新する
		update_todo(title, nextValue, (items) => {
			
			setTodoList([...items]);

		});

	};


	// //通信管理用のstate
	// const [loaded, setLoaded] = useState(false)

	// //初期値を読み込む
	// if(!loaded){
	// 	load_todo((items) => {

	// 		setLoaded(true);

	// 		//読み込みが完了したらstateを更新する
	// 		setTodoList([...items]);

	// 	});
	// }

	//useEffectを使って一回だけの読み込みを行う
	useEffect(() => {
		load_todo((items) => {
			setTodoList([...items]);
		})

	}, [])

	//
	const clearComplete = () => {
		clear_todo((items) => {

			//読み込みが完了したらstateを更新する
			setTodoList([...items]);

		});
	}
	
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
								onChange={ handleChange }
								/>

							<button onClick={ clearComplete } className="btn btn-danger">完了したタスクを削除</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App;