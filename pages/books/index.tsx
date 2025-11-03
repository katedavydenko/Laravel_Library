import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

interface Book {
  id: number;
  title: string;
  year: number;
}

interface Author {
  id: number;
  name: string;
  books: Book[];
}

declare global {
  interface Window {
    AUTHORS_DATA: Author[];
  }
}

const AuthorsList: React.FC = () => {
  const authors: Author[] = window.AUTHORS_DATA || [];
  const [hoveredAuthorId, setHoveredAuthorId] = useState<number | null>(null);

  return (
    <div>
      {authors.map(author => (
        <div 
          key={author.id} 
          style={{ marginBottom: '1em', cursor: 'pointer' }}
          onMouseEnter={() => setHoveredAuthorId(author.id)}
          onMouseLeave={() => setHoveredAuthorId(null)}
        >
          <strong>{author.name}</strong>

          {hoveredAuthorId === author.id && author.books.length > 0 && (
            <ul style={{ marginTop: '0.5em', paddingLeft: '1em' }}>
              {author.books.map(book => (
                <li key={book.id}>
                  {book.title} ({book.year})
                </li>
              ))}
            </ul>
          )}
        </div>
      ))}
    </div>
  );
};

// Mount React component
const root = ReactDOM.createRoot(document.getElementById('react-root')!);
root.render(<AuthorsList />);
